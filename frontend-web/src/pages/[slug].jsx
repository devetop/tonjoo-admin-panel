import { serverApi } from "@/axios";
import SeoHead from "@/components/SeoHead"
import dynamic from "next/dynamic";

export default function Page({ data, success, code, message }) {

    if (!success) {
        return `${code} - ${message}`;
    }

    const DynamicPage = dynamic(
        () => import('@/components/page/' + data.post_metas.find((meta) => meta.key == 'page_template').value),
        { loading: () => <p>Loading...</p>, ssr: true }
    );

    return (
        <>
            <SeoHead data={data} />
            <DynamicPage data={data} />
        </>
    )
}

export async function getServerSideProps(context) {
    try {
        const response = await serverApi.get(context.query.slug);

        if (response.status == 200 && response?.data?.data) {
            return {
                props: {
                    data: response.data.data,
                    success: response.data.success,
                }
            };
        }
    } catch (error) {
        // console.log( error );
        if (error.response.status == 301) {
            return {
                redirect: {
                    destination: error.response?.data?.destination,
                    permanent: true,
                }
            }
        }

        return {
            props: {
                success: error.response.data.success,
                message: error.response.data.message,
                code: error.response.status,
                data: null
            }
        };
    }


}