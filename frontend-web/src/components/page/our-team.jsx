import Header from "../archive/header";
import DummyTemplate from "./dummyTempate";

export default function AboutUs({data}) {
    const title = data['title'];
    const subTitle = data.post_metas.find((meta) => meta.key === 'sub_title')?.value ?? '';

    return(
        <>            
            <div className="bg-[#f2f4f7] min-h-[100vh] pb-8 lg:pb-14">

                <Header
                    breadcrumbs={['Home', title]}
                    title={title}
                    subtitle={`${subTitle || ''}`}
                    className=""
                />

                <section className="bg-transparent py-10">
                    <div className="container">
                        <DummyTemplate data={data} />
                    </div>
                </section>
            </div>
            
        </>
    );
}