import Link from "next/link";

export default function Terms({terms, term_route, className, classNameItem}) {
    return (
        <div className={`flex gap-1 mb-1 ${className || ''}`}>
            {
                terms.map((term, i) => (
                    <Link href={`/archive/${term_route}/${term.slug}`} key={i} className={`px-2 py-1 border-2 rounded-md border-gray-600 hover:bg-gray-600 hover:text-white transition-colors duration-200  ${classNameItem || ''}`}>{term.name}</Link>
                ))
            }
        </div>
    )
}