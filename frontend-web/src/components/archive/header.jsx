function Breadcrumbs({ breadcrumbs }) {
    return (
        <div className="flex gap-2 justify-center uppercase">
            {
                breadcrumbs.map((b, i) => {
                    if (i == breadcrumbs.length - 1) {
                        return <span key={i}>{b}</span>
                    } else {
                        return <span key={i}>
                            <span>{b}</span> <span>{'>'}</span>
                        </span>
                    }
                })
            }
        </div>
    )
}

export default function Header({ breadcrumbs = [], title, subtitle, className }) {
    return (
        <header className={`bg-base-primary min-h-[400px] text-center flex flex-col justify-center text-white gap-4 ${className || ''}`}>
            <Breadcrumbs breadcrumbs={breadcrumbs} />
            <h1 className="text-4xl lg:text-6xl font-bold">{title}</h1>
            <p className="text-2xl">{subtitle}</p>
        </header>
    )
}