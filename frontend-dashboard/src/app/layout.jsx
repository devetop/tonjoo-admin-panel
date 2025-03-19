import { Geist, Geist_Mono } from "next/font/google";
import "./globals.css";
import { FE_BASE_TITLE } from "@/config";
import AppWrapper from "@/components/molecules/AppWrapper";

const geistSans = Geist({
  variable: "--font-geist-sans",
  subsets: ["latin"],
});

const geistMono = Geist_Mono({
  variable: "--font-geist-mono",
  subsets: ["latin"],
});

export const metadata = {
  title: FE_BASE_TITLE,
  description: "Admin Panel from Tonjoo",
};

export default function RootLayout({ children }) {
  return (
    <html lang="en">
      <body
        className={`${geistSans.variable} ${geistMono.variable} antialiased`}
      >
        <AppWrapper>
          {children}
        </AppWrapper>
      </body>
    </html>
  );
}
