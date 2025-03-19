import { Head } from "@inertiajs/react";
import AppLayout from "@frontend/js/Layouts/AppLayout";
import HeadingAbout from "@frontend/js/Components/HeadingAbout";

// import "//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js";
// import "@frontend/vendor/bootstrap/js/bootstrap.bundle.min.js";
// import "@frontend/vendor/swiperjs/swiperjs.min.js";
// import "@frontend/script/main.min.js";

import AboutHeading from "@frontend/js/Components/AboutHeading";
import AboutCoreValue from "@frontend/js/Components/AboutCoreValue";
import AboutTheme from "@frontend/js/Components/AboutTheme";
import AboutTeam from "@frontend/js/Components/AboutTeam";

export default function AboutUs({ auth }) {
  const persons = [
    {
      name: "Arif Rachmat",
      image: "team-01.jpg",
      position: 'BUSINESS LEADER.',
      social: {
        facebook: '//facebook.com/arfi-rachman',
        twitter: '//twitter.com/arfi-rachman',
        linkedin: '//linkedin.com/arfi-rachman',
      }
    },
    {
      name: "Anisa Firda Hanum",
      image: "team-02.jpg",
    },
    {
      name: "Rino Febrian",
      image: "team-03.jpg",
    },
    {
      name: "Ferro Ferizka A",
      image: "team-04.jpg",
    },
    {
      name: "Widya Priyahita P",
      image: "team-05.jpg",
    },
    {
      name: "Brian Edityanto",
      image: "team-06.jpg",
    },
    {
      name: "Cazadira Tamzil",
      image: "team-07.jpg",
    },
    {
      name: "Achmad Adhitya",
      image: "team-08.jpg",
    },
    {
      name: "M. Nabil Satria F",
      image: "team-09.jpg",
    },
    {
      name: "Indra Dwi Prasetyo",
      image: "team-10.jpg",
    },
    {
      name: "Ageng Sajiwo",
      image: "team-11.jpg",
    },
    {
      name: "Ahmad Ataka A.R",
      image: "team-12.jpg",
    },
    {
      name: "Tyovan A. Widagdo",
      image: "team-13.jpg",
    },
    {
      name: "Ajeng Silvayanti",
      image: "team-14.jpg",
    },
    {
      name: "Sayid M. Azzahir",
      image: "team-15.jpg",
    },
    {
      name: "Syafira Annisa",
      image: "team-16.jpg",
    },
    {
      name: "Syafira Anniasdsa",
      image: "team-16.jpg",
    },
  ];

  const core_value_items = [
    {
      icon: '/dist/icons/share-segments.svg',
      title: "Envisioning",
      desc: "Pijar berdedikasi untuk menganalisis peluang di masa mendatang berbasis data & pendekatan ilmiah.",
    },
    {
      icon: '/dist/icons/pie.svg',
      title: "Elevating",
      desc: "Pijar berupaya untuk mengakselerasi potensi sumber daya yang telah ada, agar mampu berdaya saing global, serta mampu menjawab tantangan di masa depan.",
    },
    {
      icon: '/dist/icons/speed.svg',
      title: "Elevating",
      desc: "Pijar hadir untuk mengoptimasi pemanfaatan akses yang setara di segala bidang, bagi setiap orang, tanpa terkecuali.",
    },
  ];

  const theme_items = [
    {
      icon: '/dist/icons/leaf.svg',
      title: "Future Planet",
      desc: "Menganalisis & merencanakan masa depan bumi agar menjadi tempat hidup yang nyaman. Pijar akan terlibat dalam isu strategis seputar:",
      list: [
        {
          title: 'Renewable energy',
          desc: 'Energi baru terbarukan, energi alternatif, infrastruktur sistem baterai dan pengisian daya, dan lain sebagainya.'
        },
        {
          title: 'Masa Depan Ekonomi',
          desc: 'Crypto, Blockchain, ICO, dan lain sebagainya.'
        },
        {
          title: 'Ketahanan Pangan',
          desc: 'Pangan di masa depan, daging buatan (artificial meat), bioteknologi & bakterial, dan lain sebagainya.'
        },
      ]
    },
    {
      icon: '/dist/icons/people.svg',
      title: "Future Talent",
      desc: "Membantu mengantisipasi tantangan & peluang disrupsi di segala bidang, dengan mempersiapkan para talenta Indonesia agar lebih siap menghadapi masa depan. Pijar akan terlibat aktif dalam isu strategis seputar:",
      list: [
        { 
          title: 'Ketahanan Pangan',
          desc: 'Pendidikan digital, manajemen sekolah/kampus, peningkatan kapasitas pekerja, dan lain sebagainya.',
        },
        { 
          title: 'Employability',
          desc: 'Penjaringan talenta (bibit unggul), ATS (sistem pelacakan pelamar), dan lain sebagainya)',
        },
        { 
          title: 'Makhluk hidup',
          desc: 'Kesehatan fisik, kesehatan mental, tingkat kebahagiaan, dan lain sebagainya.',
        },
      ]
    },
  ];

  return (
    <AppLayout auth={auth} masthead={<HeadingAbout />}>
      
      <Head title="Pijar Foundaion" />

      <div id="about" className="about">
        <div className="container">

          <AboutHeading
            title="CORE VALUE"
            desc="Pijar berdedikasi untuk membaca peluang masa depan, mengakselerasi potensi, dan menciptakan kesetaraan"
          />
          <AboutCoreValue items={core_value_items} />

          <AboutHeading
            title="OUR TEAMS"
            desc="Lorem Ipsum is simply dummy text of the printing and typesetting industry."
          />
          <AboutTeam persons={persons} />

          <AboutHeading
            title="THEME"
            desc="Membangun talenta masa depan & bumi yang ramah untuk ditinggali"
          />
          <AboutTheme items={theme_items} />

        </div>
      </div>
    </AppLayout>
  );
}
