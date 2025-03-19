import { NextResponse } from 'next/server'
import { INTERNAL_NETWORK_BE_BASE_URL } from '@/config';

export function middleware(request) {
  let targetPathname = request.nextUrl.pathname;
  const searchParams = request.nextUrl.search;

  if (targetPathname === '/api/sanctum/csrf-cookie') {
    return NextResponse.rewrite(new URL(INTERNAL_NETWORK_BE_BASE_URL + '/sanctum/csrf-cookie'))
  }

// console.log({targetPathname});

  if (targetPathname?.startsWith('/uploads')) {
    targetPathname = `/storage${targetPathname}`
  }

  if (targetPathname?.startsWith('/private/uploads')) {
    targetPathname = `/file${targetPathname}`
  }

  const targetUrl = new URL(targetPathname + searchParams, INTERNAL_NETWORK_BE_BASE_URL);
  
  const requestHeaders = new Headers(request.headers);
  requestHeaders.set('host', new URL(INTERNAL_NETWORK_BE_BASE_URL).host);

// console.log({INTERNAL_NETWORK_BE_BASE_URL});
// console.log({targetUrl: targetUrl.toString()});

  return NextResponse.rewrite(targetUrl, {
    request: {
      headers: requestHeaders
    }
  });
}

export const config = {
  matcher: [
    '/api/sanctum/csrf-cookie',
    '/api/:path*', 
    '/uploads/:path*',
    '/private/uploads/:path*'
  ],
}