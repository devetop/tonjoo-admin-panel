import DatePicker from "../../../_component/DatePicker";
import { SelectInput2 } from "../../../_component/SelectInput";
import CheckboxInput from "../../../_component/CheckboxInput";
import TextInput from '../../../_component/TextInput';
import { Link, useForm } from "@inertiajs/react";
import { CardRepeater } from "./MasterDataFormCardRepeater";
import { useEffect } from "react";

const list_golongan_pajak = [
    'Pilih Golongan Pajak',
    'Tidak Kawin/0',
    'Tidak Kawin/1',
    'Tidak Kawin/2',
    'Tidak Kawin/3',
    'Kawin/0',
    'Kawin/1',
    'Kawin/2',
    'Kawin/3',
    'Gabungan K/I/0',
    'Gabungan K/I/1',
    'Gabungan K/I/2',
    'Gabungan K/I/3',
]
const list_posisi = [
    'Content Writer Website',
    'SEO',
    'Project Manager',
    'Quality Assurance',
    'System Analyst',
    'System Administrator',
    'Laravel Developer',
    'Frontend Developer',
    'WordPress Developer',
    'UI/UX Web Designer',
    'Staff HR Personalia',
    'Admin Project',
]
const list_divisi = [
    'SEO & CW',
    'Administrasi',
    'Teknikal',
    'Rumah Tangga',
    'HR',
    'Sales',
    'Finance',
]
const list_cuti_tahunan = [
    0, 12, 56, 99
]
const list_kontrak = [
    'Kontrak 1',
    'Kontrak 2',
    'Kontrak 3',
    'Kontrak 4',
]

const _defaultData = {
    masa_berlaku_start: '',
    masa_berlaku_end: '',
    golongan_pajak: '',
    bpjs: '',
    divisi: '',
    posisi: '',
    cuti_tahunan: '',
    kontrak: '',
    minimal_jam: '',
    rate_lembur: '',
    catatan: '',
    status: '',
    pendapatan: [],
    dummy_endpoint: 1,
}

export default ({ defaultData = _defaultData, disabled = false }) => {

    const { data, setData, post, errors } = useForm(defaultData);

    const onSubmitHandler = (e) => {
        e.preventDefault()
        post('')
    }

    return (
        <form acceptCharset="UTF-8" onSubmit={onSubmitHandler} method="post" role="form" className="multi-action-form validate-form">

            <div className="row">

                <div className="col-12 col-lg">
                    <div className="card">
                        <div className="card-header py-2">
                            <h3 className="card-title">Kontrak</h3>
                        </div>
                        <div className="card-body">
                            <div className="row">
                                <div className="col-12 col-xl-6">
                                    <div className="form-group row">
                                        <div className="col-12 col-md-2 col-lg-4">
                                            <label className="control-label text-right font-weight-normal d-flex justify-content-end align-items-center">
                                                Masa berlaku
                                                <span className="required">*</span>
                                            </label>
                                        </div>
                                        <div className="col-12 col-md-10 col-lg-8">
                                            <div className="d-flex align-items-center">
                                                <DatePicker
                                                    setValue={(e) => setData('masa_berlaku_start', e)}
                                                    value={data.masa_berlaku_start}
                                                    disabled={disabled}
                                                />
                                                <div className="mx-2">
                                                    s.d
                                                </div>
                                                <DatePicker
                                                    setValue={(e) => setData('masa_berlaku_end', e)}
                                                    value={data.masa_berlaku_end}
                                                    disabled={disabled}
                                                />
                                            </div>
                                            {
                                                errors.masa_berlaku_start && (
                                                    <p className="text-danger">{errors.masa_berlaku_start}</p>
                                                )
                                            }
                                            {
                                                errors.masa_berlaku_end && (
                                                    <p className="text-danger">{errors.masa_berlaku_end}</p>
                                                )
                                            }
                                        </div>
                                    </div>
                                    <div className="form-group row">
                                        <div className="col-12 col-md-2 col-lg-4">
                                            <label className="control-label text-right font-weight-normal d-flex justify-content-end align-items-center">
                                                Golongan Pajak
                                                <span className="required">*</span>
                                            </label>
                                        </div>
                                        <div className="col-12 col-md-10 col-lg-8">
                                            <div className="input-wrap">
                                                <SelectInput2
                                                    options={list_golongan_pajak.map(p => ({
                                                        label: p,
                                                        value: p,
                                                    }))}
                                                    value={data.golongan_pajak}
                                                    onChangeHandler={(e) => setData('golongan_pajak', e?.value || '')}
                                                    error={errors.golongan_pajak}
                                                    disabled={disabled}
                                                />
                                            </div>
                                        </div>
                                    </div>
                                    <div className="form-group row">
                                        <div className="col-12 col-md-2 col-lg-4">
                                            <label className="control-label text-right font-weight-normal d-flex justify-content-end align-items-center">BPJS</label>
                                        </div>
                                        <div className="col-12 col-md-10 col-lg-8 d-flex align-items-center">
                                            <div className="row">
                                                <div className="col-auto">
                                                    <div className="input-wrap d-flex align-items-center px-2">
                                                        <div className="checkbox checkbox-custom mr-2">
                                                            <label className="font-weight-normal pl-0">
                                                                <CheckboxInput 
                                                                    index='Ketenagakerjaan'
                                                                    label='Ketenagakerjaan'
                                                                    value={data.bpjs == 'ketenagakerjaan'}
                                                                    onChangeHandler={(e) => setData('bpjs', e.target.checked ? 'ketenagakerjaan' : '')}
                                                                    labelClassName='pl-0'
                                                                />
                                                            </label>
                                                        </div>
                                                        <div className="checkbox checkbox-custom">
                                                            <label className="font-weight-normal">
                                                                <CheckboxInput 
                                                                    index='Kesehatan'
                                                                    label='Kesehatan'
                                                                    value={data.bpjs == 'kesehatan'}
                                                                    onChangeHandler={(e) => setData('bpjs', e.target.checked ? 'kesehatan' : '')}
                                                                    labelClassName='pl-0'
                                                                />
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div className="form-group row">
                                        <div className="col-12 col-md-2 col-lg-4">
                                            <label className="control-label text-right font-weight-normal d-flex justify-content-end align-items-center">
                                                Posisi
                                                <span className="required">*</span>
                                            </label>
                                        </div>
                                        <div className="col-12 col-md-10 col-lg-8">
                                            <div className="input-wrap">
                                                <SelectInput2
                                                    options={list_posisi.map(p => ({
                                                        label: p,
                                                        value: p,
                                                    }))}
                                                    value={data.posisi}
                                                    onChangeHandler={(e) => setData('posisi', e?.value || '')}
                                                    error={errors.posisi}
                                                    disabled={disabled}
                                                />
                                            </div>
                                        </div>
                                    </div>
                                    <div className="form-group row">
                                        <div className="col-12 col-md-2 col-lg-4">
                                            <label className="control-label text-right font-weight-normal d-flex justify-content-end align-items-center">
                                                Divisi
                                                <span className="required">*</span>
                                            </label>
                                        </div>
                                        <div className="col-12 col-md-10 col-lg-8">
                                            <div className="input-wrap">
                                                <SelectInput2
                                                    options={list_divisi.map(p => ({
                                                        label: p,
                                                        value: p,
                                                    }))}
                                                    value={data.divisi}
                                                    onChangeHandler={(e) => setData('divisi', e?.value || '')}
                                                    error={errors.divisi}
                                                    disabled={disabled}
                                                />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div className="col-12 col-xl-6">
                                    <div className="form-group row">
                                        <div className="col-12 col-md-2 col-lg-4">
                                            <label className="control-label text-right font-weight-normal d-flex justify-content-end align-items-center">
                                                Cuti / Tahun
                                                <span className="required">*</span>
                                            </label>
                                        </div>
                                        <div className="col-12 col-md-10 col-lg-8">
                                            <div className="input-wrap">
                                                <SelectInput2
                                                    options={list_cuti_tahunan.map(p => ({
                                                        label: p,
                                                        value: p,
                                                    }))}
                                                    value={data.cuti_tahunan}
                                                    onChangeHandler={(e) => setData('cuti_tahunan', e?.value || '')}
                                                    error={errors.cuti_tahunan}
                                                    disabled={disabled}
                                                />
                                            </div>
                                        </div>
                                    </div>
                                    <div className="form-group row">
                                        <div className="col-12 col-md-2 col-lg-4">
                                            <label className="control-label text-right font-weight-normal d-flex justify-content-end align-items-center">
                                                Jenis Kontrak
                                                <span className="required">*</span>
                                            </label>
                                        </div>
                                        <div className="col-12 col-md-10 col-lg-8">
                                            <div className="input-wrap">
                                                <SelectInput2
                                                    options={list_kontrak.map(p => ({
                                                        label: p,
                                                        value: p,
                                                    }))}
                                                    value={data.kontrak}
                                                    onChangeHandler={(e) => setData('kontrak', e?.value || '')}
                                                    error={errors.kontrak}
                                                    disabled={disabled}
                                                />
                                            </div>
                                        </div>
                                    </div>
                                    <div className="form-group row">
                                        <div className="col-12 col-md-2 col-lg-4">
                                            <label className="control-label text-right font-weight-normal d-flex justify-content-end align-items-center">Min. Jam/Bulan</label>
                                        </div>
                                        <div className="col-12 col-md-10 col-lg-8">
                                            <div className="input-wrap">
                                                <TextInput
                                                    index='minimal_jam'
                                                    value={data.minimal_jam}
                                                    onChangeHandler={(e) => setData('minimal_jam', e.target.value)}
                                                    error={errors.minimal_jam}
                                                    inputProps={{
                                                        placeholder: 'Minimal Jam per Bulan',
                                                        disabled: disabled
                                                    }}
                                                />
                                            </div>
                                        </div>
                                    </div>
                                    <div className="form-group row">
                                        <div className="col-12 col-md-2 col-lg-4">
                                            <label className="control-label text-right font-weight-normal d-flex justify-content-end align-items-center">Rate Lembur</label>
                                        </div>
                                        <div className="col-12 col-md-10 col-lg-8">
                                            <div className="input-wrap">
                                                <TextInput
                                                    name="rate_lembur"
                                                    type="number"
                                                    value={data.rate_lembur}
                                                    onChangeHandler={(e) => setData('rate_lembur', e.target.value)}
                                                    error={errors.rate_lembur}
                                                    inputProps={{
                                                        placeholder: 'Masukkan Rate Lembur',
                                                        disabled: disabled
                                                    }}
                                                />
                                            </div>
                                        </div>
                                    </div>
                                    <div className="form-group row">
                                        <div className="col-12 col-md-2 col-lg-4">
                                            <label className="control-label text-right font-weight-normal d-flex justify-content-end align-items-center">Catatan</label>
                                        </div>
                                        <div className="col-12 col-md-10 col-lg-8">
                                            <div className="input-wrap">
                                                <TextInput
                                                    name="catatan"
                                                    type="textarea"
                                                    value={data.catatan}
                                                    onChangeHandler={(e) => setData('catatan', e.target.value)}
                                                    error={errors.catatan}
                                                    inputProps={{
                                                        placeholder: 'Catatan kontrak',
                                                        disabled: disabled
                                                    }}
                                                />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <CardRepeater
                        name='pendapatan'
                        onChange={(newValue) => setData('pendapatan', newValue)}
                        value={data.pendapatan}
                        disabled={disabled}
                        errors={errors}
                    />

                    <CardRepeater
                        name='potongan'
                        onChange={(newValue) => setData('potongan', newValue)}
                        value={data.potongan}
                        disabled={disabled}
                        errors={errors}
                    />
                </div>

                <div className="col-12 col-lg-auto">
                    <div className="w-300px">
                        <div className="card">
                            <div className="card-header py-2">
                                <h3 className="card-title float-none">Aksi</h3>
                            </div>
                            <div className="card-body py-2">
                                <div className="form-group mb-2">
                                    <label className="control-label font-weight-normal">Status</label>
                                    <div className="col-form-input">
                                        <SelectInput2
                                            options={[
                                                { label: 'Tidak Aktif', value: 'non-aktif' },
                                                { label: 'Aktif', value: 'aktif' },
                                            ]}
                                            value={data.status}
                                            onChangeHandler={(e) => setData('status', e?.value || '')}
                                            error={errors.status}
                                        />
                                    </div>
                                </div>
                                <div className="form-group">
                                    <a href="#" className="text-danger d-block">
                                        <i className="ph ph-trash mr-2"></i> Pindah ke trash
                                    </a>
                                </div>
                            </div>
                            <div className="card-footer">
                                <div className="submit-row">
                                    <div className="row">
                                        <div className="col">
                                            <Link href='/jsx/master-data' className="btn btn-sm btn-md btn-default d-block w-full">Cancel</Link>
                                        </div>
                                        {
                                            !disabled && (
                                                <div className="col">
                                                    <div className="btn-group w-100">
                                                        <button className="btn btn-sm btn-primary btn-block" type="submit">Submit</button>
                                                    </div>
                                                </div>
                                            )
                                        }
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div className="card">
                            <div className="card-header">
                                <h3 className="card-title float-none">Audit Trail</h3>
                            </div>
                            <div className="card-body p-0">
                                <div className="table-responsive">
                                    <table className="table table-compact table-compact table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th width="120">Tanggal</th>
                                                <th>Nama</th>
                                                <th>Keterangan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td> 02/05/23 07:03:51 </td>
                                                <td>User Full Name</td>
                                                <td>check in</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    )
}