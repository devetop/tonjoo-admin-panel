import { dateFormat } from "@/helper";

export default function DummyTemplate({data}) {
    return (
        <div className="container m-auto max-w-[500px]">
            <table className="w-full">
                <tbody>
                    <tr>
                        <td>title</td>
                        <td>: {data.title}</td>
                    </tr>
                    <tr>
                        <td>content</td>
                        <td>: <div className="inline-block" dangerouslySetInnerHTML={{__html: data.content}}></div></td>
                    </tr>
                    <tr>
                        <td>author</td>
                        <td>: {data.author.name}</td>
                    </tr>
                    <tr>
                        <td>created_at</td>
                        <td>: {dateFormat(data.created_at)}</td>
                    </tr>
                    {
                        data.post_metas.map((meta, i) => (
                            <tr key={i}>
                                <td>meta {meta.key}</td>
                                <td>: { (typeof meta.value == 'string' ? meta.value : JSON.stringify(meta.value)) }</td>
                            </tr>
                        ))
                    }
                </tbody>
            </table>
        </div>
    )
}