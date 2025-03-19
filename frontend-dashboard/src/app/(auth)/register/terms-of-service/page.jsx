import { INTERNAL_NETWORK_BE_BASE_URL } from "@/config";

async function getTermsOfServices() {
    const res = await fetch(INTERNAL_NETWORK_BE_BASE_URL + '/api/options/terms-of-service', {
        cache: 'no-store'
    });

    if (!res.ok) {
        throw new Error('Failed to fetch privacy policy');
    }

    return res.json();
}

export default async function PrivacyPolicy() {
    const { data } = await getTermsOfServices()
    
    return (
        <div className="max-w-[900] pt-20 mx-auto">
            <div className="border shadow rounded-md p-4" dangerouslySetInnerHTML={{__html: data}}></div>
        </div>
    )
}