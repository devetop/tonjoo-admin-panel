import Link from "next/link";
import { FaArrowRight } from "react-icons/fa6";
import Button from "../Button";

export default function Hero() {
    return (
        <section style={{ backgroundImage: `url('/assets/pages/home/hero-bg.jpg')` }} className="min-h-[100vh] lg:h-[900px] bg-cover bg-center flex items-center">
            <div className="text-white text-center md:text-left flex flex-col gap-2 py-10 px-5">
                <h1 className="text-4xl md:text-6xl font-semibold lg:ml-[200px] mb-3">Halo, Kami Lipsum!</h1>
                <p className="lg:max-w-[400px] md:max-w-none m-auto lg:ml-[200px]">Ruang kolaborasi untuk menciptakan masa depan yang berkesetaraan</p>
                <div className="flex justify-center md:justify-start lg:ml-[200px]">

                    <Button 
                        href="#"
                        text="LET’S GET STARTED"
                        icon={<FaArrowRight />}
                        iconPos="right"
                        btnClass="bg-secondary mt-5 hover:opacity-80 duration-500"
                    />
                    
                </div>
            </div>
        </section>
    )
}