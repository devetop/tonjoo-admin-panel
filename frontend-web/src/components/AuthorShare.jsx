import SharePost from "./SharePost";

export default function AuthorShare(props) {
    const {title, image, permalink} = props;
    return(
        <>
            <div className="my-8 py-8 border-y border-gray-300 flex flex-wrap">
                <div className="w-full lg:w-[45%] max-lg:mb-6">
                    <h2 className="font-semibold text-2xl">Media Author</h2>

                    <div className="flex items-center mt-4">

                        <div className="flex-initial basis-auto">
                            <div className="block w-14 h-14 rounded-lg bg-slate-600">&nbsp;</div>
                        </div>
                        <div className="flex-initial flex jusitify-center flex-col ml-4">
                            <h3 className="font-bold">Mas Admin</h3>
                            <p className="mb-0 text-sm">Author & Penulis Handal Pijari</p>
                        </div>

                    </div>
                </div>
                <div className="w-full lg:w-[55%]">
                    <h2 className="font-semibold text-2xl">Bagikan ke</h2>
                    <div className="mt-4">
                        <SharePost 
                            title={title}
                            image={image}
                            permalink={permalink}
                        />

                    </div>
                </div>
            </div>
        </>
    );
};
