import { Button } from "@/components/ui/button"
import { DropdownMenu, DropdownMenuCheckboxItem, DropdownMenuContent, DropdownMenuTrigger } from "@/components/ui/dropdown-menu"
import { ChevronDown } from "lucide-react"
import { usePathname, useRouter, useSearchParams } from "next/navigation";

export default function BaseTableFilter({ name, options = [] }) {

    const router = useRouter()
    const pathname = usePathname()
    const search = useSearchParams()
    const params = Object.fromEntries(search)

    return (
        <DropdownMenu>
            <DropdownMenuTrigger asChild>
                <Button variant="outline" className="ml-auto capitalize" size="xs">
                    {name} <ChevronDown />
                </Button>
            </DropdownMenuTrigger>
            <DropdownMenuContent align="end">
                {
                    (Object.keys(options))?.map((optionId, idx) => {
                        const checked = (params[name]?.split(',') || []).some(item => item == optionId);

                        return (
                            <DropdownMenuCheckboxItem
                                key={idx}
                                className="capitalize"
                                checked={checked}
                                onCheckedChange={(value) => {
                                    // copy query params
                                    let newParams = {...params};
                                    // ubah query params ke array
                                    let paramArr = newParams[name] ? newParams[name].split(',') : [];
                                    // manipulasi array
                                    if (value) {
                                        paramArr = paramArr ? [...paramArr, optionId] : [optionId];
                                    } else {
                                        paramArr = [...paramArr].filter((item) => item !== optionId);
                                    }
                                    // ubah array ke string
                                    newParams[name] = paramArr.join(',')
                                    newParams['page'] = '1'
                                    // ubah query params ke string kembali
                                    const newSearchParams = new URLSearchParams(newParams).toString()
                                    // pindah ke halaman dengan query params baru
                                    router.push(`${pathname}?${newSearchParams}`);
                                }}
                            >
                                {options[optionId]}
                            </DropdownMenuCheckboxItem>
                        );
                    })
                }
            </DropdownMenuContent>
        </DropdownMenu>
    )
}