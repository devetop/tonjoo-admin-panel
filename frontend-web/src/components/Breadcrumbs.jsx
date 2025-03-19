import Link from "next/link"
import { FaChevronRight } from "react-icons/fa6"

function Breadcrumb({breadcrumb}) {
    if (breadcrumb?.length > 1) {
        return <Link className="text-gray-400 hover:text-gray-700 transition-colors duration-100" href={breadcrumb[1]}>{breadcrumb[0]}</Link>
    } else {
        return <span>{breadcrumb[0]}</span>
    }
}

export default function Breadcrumbs(props) {
    const {className="", breadcrumbs} = props;
    
    return (
        <div className={`block text-gray-700 text-ellipsis overflow-hidden w-full whitespace-nowrap ${className || ''}`}>
            {
                breadcrumbs.map((b, i) => {
                    if (i == breadcrumbs.length - 1) {
                        return <Breadcrumb breadcrumb={b} key={i} />
                    } else {
                        return <span key={i} className="inline">
                            <Breadcrumb breadcrumb={b} key={i} /> <FaChevronRight className="text-gray-700 mt-1 inline align-top mr-1" />
                        </span>
                    }
                })
            }
        </div>
    )
}