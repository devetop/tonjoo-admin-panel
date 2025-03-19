import FormInput from "@/components/FormInput";
import Icons from "@/components/Icons";
import Header from "@/components/archive/header";


export default function ContactUs({data}) {
    const title = data['title'];
    const subTitleMeta = data.post_metas.find((meta) => meta.key === 'sub_title');
    const subTitle = subTitleMeta  ? subTitleMeta.value : null;

    return(
        <>
            <div className="bg-[#f2f4f7] min-h-[100vh] pb-8 lg:pb-14">

                <Header
                    breadcrumbs={['Home', title]}
                    title={title}
                    subtitle={subTitle}
                    className="!pt-20 lg:!pt-32 !pb-[300px]"
                />

                <section className="bg-transparent -mt-[250px] lg:-mt-[250px]">
                    <div className="container mx-auto">
                        <div className="flex max-lg:flex-wrap rounded-xl overflow-hidden shadow-md">
                            <div className="flex-initial basis-full lg:basis-1/2">
                                <div className="bg-secondary text-white p-6 lg:p-16 w-full h-full">

                                    <h2 className="text-3xl lg:text-[34px] leading-tight font-bold">Contact Us Now</h2>

                                    <div className="mt-[40px]">
                                        <ul>
                                            <li className="mb-6 last:mb-0">
                                                <div className="flex items-start *:first:mr-3">
                                                    <Icons icon="envelope-simple" />
                                                    <span><a href="mailto:hello@emailcorporate.com">hello@emailcorporate.com</a></span>
                                                </div>
                                            </li>
                                            <li className="mb-6 last:mb-0">
                                                <div className="flex items-start *:first:mr-3">
                                                    <Icons icon="device-mobile-camera" />
                                                    <span>0812-XXXX-XXXX</span>
                                                </div>
                                            </li>
                                            <li className="mb-6 last:mb-0">
                                                <div className="flex items-start *:first:mr-3">
                                                    <Icons icon="map-pin" />
                                                    <span>Jl. Tongkol Raya, Mladangan, Minomartani, Kec. Ngaglik, Kabupaten Sleman, Daerah Istimewa Yogyakarta 55581</span>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>

                                </div>
                            </div>
                            <div className="flex-initial basis-full lg:basis-1/2">
                                <div className="bg-white p-6 lg:p-16 w-full h-full">
                                    <form>
                                        <div className="mb-4 last:mb-0 w-full">
                                            <FormInput 
                                                label={`Nama Lengkap`}
                                                type={`text`}
                                                placeholder={`Masukkan nama lengkap Anda`}
                                            />
                                        </div>
                                        <div className="mb-4 last:mb-0 w-auto -mx-3">
                                            <div className="flex max-lg:flex-wrap">

                                                <div className="flex-initial basis-full mb-4 last:mb-0 lg:basis-1/2 px-3">
                                                    <FormInput 
                                                        label={`Email`}
                                                        type={`email`}
                                                        placeholder={`Masukkan alamat email Anda`}
                                                    />
                                                </div>
                                                <div className="flex-initial basis-full mb-4 last:mb-0 lg:basis-1/2 px-3">
                                                    <FormInput 
                                                        label={`Telepon`}
                                                        type={`number`}
                                                        placeholder={`Masukkan telepon Anda`}
                                                    />
                                                </div>

                                            </div>
                                        </div>
                                        <div className="mb-4 last:mb-0 w-full">
                                            <FormInput 
                                                label={`Website (Opsional)`}
                                                type={`text`}
                                                placeholder={`Masukkan alamat website Anda`}
                                            />
                                        </div>
                                        <div className="mb-4 last:mb-0 w-full">
                                            <FormInput 
                                                label={`Tuliskan Pesan`}
                                                type={`textarea`}
                                                placeholder={`Tulis pesan Anda`}
                                            />
                                        </div>
                                        <div className="mb-4 last:mb-0 w-full">
                                            <button type="submit" className="max-lg:w-full py-3 px-6 bg-secondary text-white rounded-full">CONTACT US</button>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </>
    );
}