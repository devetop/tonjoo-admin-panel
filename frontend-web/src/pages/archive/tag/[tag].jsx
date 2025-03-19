import { useParams } from "next/navigation"

export default function Tag() {
    const params = useParams()
    return (
        <h1>Tag - {params?.tag}</h1>
    )
}