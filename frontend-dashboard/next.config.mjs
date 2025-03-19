/** @type {import('next').NextConfig} */
const nextConfig = {
    reactStrictMode: false,
    images: {
        formats: ['image/avif', 'image/webp'],
        // domains: [
        //   'dashboard.dev.local'
        // ],
        remotePatterns: [
            {
              protocol: 'https',
              hostname: 'dashboard.dev.local',
              port: '443'
            },
            {
              protocol: 'http',
              hostname: '127.0.0.1',
              port: '8090'
            },
        ]
    }
};

export default nextConfig;
