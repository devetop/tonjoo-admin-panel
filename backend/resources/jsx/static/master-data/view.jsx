import { useEffect } from "react"
import { useDispatch } from "react-redux"
import { setBreadcrumbs } from "../../_redux/slices/LayoutSlice"
import ContentLayout from "../../_component/ContentLayout"
import { SectionHeader, SectionTitle } from "../../_component/SectionHeader"
import { Head } from "@inertiajs/react"
import MasterDataForm from "./include/MasterDataForm"
import TapHead from "../../_component/TapHead"

const _defaultData = {
    masa_berlaku_start: "2024-01-01",
    masa_berlaku_end: "2025-01-01",
    golongan_pajak: "Tidak Kawin/0",
    bpjs: "ketenagakerjaan",
    divisi: "SEO & CW",
    posisi: "SEO",
    cuti_tahunan: 12,
    kontrak: "Kontrak 2",
    minimal_jam: "5000",
    rate_lembur: "4000000",
    catatan: "note",
    status: "aktif",
    pendapatan: [
        {
            nama: "gaji-pokok",
            tipe: "gaji",
            nominal: "10000"
        },
        {
            nama: "gaji-pokok",
            tipe: "gaji",
            nominal: "100000"
        },
        {
            nama: "tunjangan-performa",
            tipe: "tunjangan",
            nominal: "150000"
        }
    ],
    dummy_endpoint: 1
}

function MasterDataDetail() {
    return <MasterDataForm defaultData={_defaultData} disabled={true} />
}

export default (props) => {

    const dispatch = useDispatch()
    useEffect(() => {
        dispatch(setBreadcrumbs([['Master Data', '/jsx/master-data'], ['View', '/jsx/master-data/view']]));
    }, [])

    return (
        <ContentLayout
            sectionHeader={
                <SectionHeader>
                    <SectionTitle>
                        Detail Master Data
                    </SectionTitle>
                </SectionHeader>
            }
        >
            <TapHead title="Detail Master Data" />
            <MasterDataDetail {...props} />
        </ContentLayout>
    )
}