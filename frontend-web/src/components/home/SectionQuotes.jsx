import Image from "next/image";
import HeadSection from "../HeadSection";
import Icons from "../Icons";
import SlideItemQuote from "../SlideQuote";
import SwiperSlider from "../SwiperSlider";

export default function SectionQuotes(props) {

    const quotes = [
        {
            image: '/assets/pages/home/800px-Nelson_Mandela_1994.jpg',
            quote: "The greatest glory in living lies not in never falling, but in rising every time we fall.",
            name: "Nelson Mandela",
            position: "Presiden Afrika Selatan (1994-1999)"
        },
        {
            image: '/assets/pages/home/220px-Mahatma-Gandhi,_studio,_1931.jpg',
            quote: "Be the change that you wish to see in the world.",
            name: "Mahatma Gandhi",
            position: "Pemimpin Gerakan Kemerdekaan India"
        },
        {
            image: '/assets/pages/home/220px-Marie_Curie_c._1920s.jpg',
            quote: "In life, nothing is to be feared, it is only to be understood. Now is the time to understand more, so that we may fear less.",
            name: "Marie Curie",
            position: "Ilmuwan Penerima Hadiah Nobel"
        },
        {
            image: '/assets/pages/home/220px-Martin_Luther_King,_Jr..jpg',
            quote: "I have a dream that my four little children will one day live in a nation where they will not be judged by the color of their skin, but by the content of their character.",
            name: "Martin Luther King Jr.",
            position: "Pemimpin Hak Sipil Amerika Serikat"
        },
        {
            image: '/assets/pages/home/800px-Einstein_1921_by_F_Schmutzer_-_restoration.jpg',
            quote: "Two things are infinite: the universe and human stupidity; and I'm not sure about the universe.",
            name: "Albert Einstein",
            position: "Fisikawan Teoretis"
        },
        {
            image: '/assets/pages/home/800px-President_Abdurrahman_Wahid_-_Indonesia.jpg',
            quote: "We must be able to accept differences. Diversity is not to be uniformed, but to be mutually respected.",
            name: "Abdurrahman Wahid (Gus Dur)",
            position: "Presiden Indonesia (1999-2001)"
        },
    ];

    return(
        <>

            <section className="py-10 lg:py-20">
                <div className="container">
                    
                    <HeadSection 
                        title="BENEFICIARIES QUOTES"
                        desc="Becoming a trusted reference"
                    />

                </div>

                <div className="container !max-w-full">
                    <SwiperSlider 
                        gap = {20}
                        gapMd = {20}
                        gapLg = {30}
                        showSlide = {1.1}
                        showSlideMd = {1.1}
                        showSlideLg = {1.8}
                        slide = "SlideQuote"
                        content = {quotes}
                        centered = {true}
                        loop={true}
                        pagination = {true}
                        className="swiper-quote max-lg:!-mx-5 max-lg:!px-5 !pt-5 !pb-16"
                    />
                </div>
            </section>

        </>
    );
};
