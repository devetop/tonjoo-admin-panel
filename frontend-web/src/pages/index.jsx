// import { OulinedButtonLink } from "@/components/button";
import Hero from "@/components/home/Hero";
import SectionCard, { WhatWeDo } from "@/components/home/SectionCard";
import wheWeAreImageUrl from '../../public/assets/pages/home/who-we-are.png'
import ourVision from '../../public/assets/pages/home/our-vision.png'
import whatWeDo from '../../public/assets/pages/home/what-we-do.png'
import weare1 from '../../public/assets/pages/home/weare-01.svg';
import weare2 from '../../public/assets/pages/home/weare-02.svg';
import weare3 from '../../public/assets/pages/home/weare-03.svg';

import Head from "next/head";
import SectionCoalitions from "@/components/home/SectionCoalitions";
import SectionMedia from "@/components/home/SectionMedia";
import SectionQuotes from "@/components/home/SectionQuotes";
import Button from "@/components/Button";

export default function Home() {
	return (
		<main>
			<Head>
				<title>Home</title>
			</Head>

			<Hero />

			<SectionCard
				imageUrl={wheWeAreImageUrl}
				title={'Who We are?'}
				body={
					<>
						<p className="text-gray-500 mb-6">Pijar Foundation merupakan ekosistem yang menghubungkan sektor-sektor strategis dalam rangka menghadapi tren, tantangan, dan peluang masa depan</p>
						<Button
							href={'#'}
							text="Read More"
							btnClass="!border-secondary text-secondary hover:bg-secondary hover:text-white !py-3 text-center justify-center min-w-60 w-full lg:w-auto"
						/>
					</>
				}
			/>
			<SectionCard
				imageUrl={ourVision}
				title={'Our Vision'}
				body={
					<>
						<p className="text-gray-500 mb-6">Membangun kerjasama antar sektor strategis untuk menghadapi tren, peluang, dan tantangan di masa depan</p>
						<Button
							href={'#'}
							text="Read More"
							btnClass="!border-secondary text-secondary hover:bg-secondary hover:text-white !py-3 text-center justify-center min-w-60 w-full lg:w-auto"
						/>
					</>
				}
				isReverse={true}
			/>
			<SectionCard
				imageUrl={whatWeDo}
				title={'What We Do?'}
				body={
					<div>
						<WhatWeDo iconUrl={weare1} title="Shape Future Mind" body="Membentuk mindset yang bertumpu pada gagasan-gagasan masa depan" />
						<WhatWeDo iconUrl={weare2} title="Shape Future Market" body="Membentuk iklim pasar yang terbuka dengan inovasi & teknologi masa depan" />
						<WhatWeDo iconUrl={weare3} title="Shape Future Policy" body="Membentuk kebijakan yang mengakomodasi tantangan & peluang masa depan" />
					</div>
				}
			/>

			<SectionQuotes />
			<SectionMedia />
			<SectionCoalitions />


		</main>
	);
}
