"use client"

import { useRouter, usePathname } from "next/navigation";
import { useCallback, useEffect } from 'react';

/**
 * redirect ke route tertentu, berdasarkan status auth
 */
export function useProtectedRoute(guestableRoutes, loginPathname, homePathname, isLoggedIn) {
  const router = useRouter();
  const pathname = usePathname();

  const handleRedirect = useCallback(() => {
    // mengakses private route saat belum login
    if (!guestableRoutes.includes(pathname)) {
      if (!isLoggedIn) {
        router.push(`${loginPathname}?redirect=${pathname}`);
      }
    } else {
      // mengakses public route saat sudah login
      if (isLoggedIn) {
        router.push(`${homePathname}?redirect=${pathname}`)
      }
    }
  }, [pathname, isLoggedIn, guestableRoutes, loginPathname]);

  // @todo handle login dengan token saja maybe
  useEffect(handleRedirect, [handleRedirect]);
}