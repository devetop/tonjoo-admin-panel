'use client';

import { useEffect } from 'react';

export function ErrorBoundary({ error, children }) {
    useEffect(() => {
        if (error) {
            throw error;
        }
    }, [error]);
    return <>{children}</>;
}