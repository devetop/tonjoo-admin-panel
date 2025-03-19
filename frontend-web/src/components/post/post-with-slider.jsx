export default function PostWithSlider({data}) {
    // console.log(
    //     data.post_metas.find((meta) => meta.key === 'meta_slider')
    // );

    const sliderMeta = data.post_metas.find((meta) => meta.key === 'meta_slider');
    const sliderMetaValue = sliderMeta?.value;

    return (
        <>
            { sliderMetaValue && sliderMetaValue.length > 0 && (
                <>

                    <h1>Post With Slider - {data.subTitle}</h1>

                    <div className="flex gap-1">
                        {
                            sliderMetaValue.map((slide, i) => (
                                <div key={i} dangerouslySetInnerHTML={{__html: slide}}></div>
                            ))
                        }
                    </div>

                </>
            )}
        </>
    )
}