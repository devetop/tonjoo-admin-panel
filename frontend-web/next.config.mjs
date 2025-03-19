
/** @type {import('next').NextConfig} */
const nextConfig = {
  reactStrictMode: false,
  images: {
    formats: ["image/avif", "image/webp"],
    domains: ['img.youtube.com', 'placehold.co', 'localhost', 'admin.tap.tongkolspace.com', '127.0.0.1','backend'],
    remotePatterns: [
      {
        protocol: process.env.FRONTEND_CMS_SERVER_API_PROTOCOL || 'http',
        hostname: process.env.FRONTEND_CMS_SERVER_API_HOSTNAME || '127.0.0.1',
        port: '80',
        pathname: '/storage/**',
      },
      {
        protocol: process.env.FRONTEND_CMS_SERVER_API_PROTOCOL || 'http',
        hostname: process.env.FRONTEND_CMS_SERVER_API_HOSTNAME || '127.0.0.1',
        pathname: '/assets/**',
      },
      {
        protocol: process.env.FRONTEND_CMS_CLIENT_API_PROTOCOL || 'http',
        hostname: process.env.FRONTEND_CMS_CLIENT_API_HOSTNAME || '127.0.0.1',
        pathname: '/assets/**',
      },
      {
        protocol: 'https',
        hostname: 'www.gravatar.com',
      }
    ]
  }
};

export default nextConfig;
