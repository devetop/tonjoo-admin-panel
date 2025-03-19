import { clientApi } from "@/axios";
import Footer from "@/components/Footer";
import Navbar from "@/components/Navbar";
import "@/styles/globals.css";
import { Roboto } from "next/font/google";
import { useEffect, useMemo, useState } from "react";

const roboto = Roboto({ subsets: ['latin'], weight: ['400'] });

export default function App({ Component, pageProps }) {

  const [options, setOptions] = useState(null);
  const [lastUpdated, setLastUpdated] = useState(null);

  const fetchThemeOptions = () => {
    console.log('get theme options');
    clientApi.get('/theme-options')
      .then(res => {
        if (!res?.data?.success) return;
        setOptions(res?.data?.data);
        setLastUpdated(Date.now());
      });
  };

  useEffect(() => {
    if (!options || !lastUpdated || Date.now() - lastUpdated > 60000) { // 60000 ms = 1 minute
      fetchThemeOptions();
    }
  });

  const cachedOptions = useMemo(() => options, [options]);

  return (
    <div className={`${roboto.className}`}>
      <Navbar options={cachedOptions} />
      <main className="site-main">
        <Component {...pageProps} />
      </main>
      <Footer options={cachedOptions} />
    </div>
  )
}