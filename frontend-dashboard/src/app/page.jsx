"use client"

import Loading from "@/components/layout/loading";
import { usePathname, useRouter } from "next/navigation";
import { useEffect } from "react";

export default function Home() {
  const pathname = usePathname();
  const router = useRouter();

  useEffect(() => {
    router.push('/dashboard')
  }, [pathname])

  return <Loading />;
}
