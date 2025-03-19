import { Link } from '@inertiajs/react';

export default function MasterDataTable({ pegawai }) {
    return (
        <table
            cellSpacing="0"
            className="table table-compact table-head-fixed table-bordered table-head-nowrap table-striped table-main"
            width="100%"
        >
            <thead>
                <tr>
                    <th>Pegawai</th>
                    <th>Tanggal Kontrak</th>
                    <th>Sisa Kontrak</th>
                    <th>Posisi</th>
                    <th>Status</th>
                    <th>Divisi</th>
                    <th>Total Benefit</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                {pegawai.data.map((p, i) => (
                    <tr key={i}>
                        <td>{p.pegawai}</td>
                        <td>{p.tanggal_kontrak}</td>
                        <td>{p.sisa_kontrak}</td>
                        <td>{p.posisi}</td>
                        <td>{p.status}</td>
                        <td>{p.divisi}</td>
                        <td>{p.benefit}</td>
                        <td className='text-center'>
                            <Link className='mx-1 text-dark' href='/jsx/master-data/edit'>
                                <i className="ph ph-pencil"></i>
                            </Link>
                            <Link className='mx-1 text-dark' href='/jsx/master-data/view'>
                                <i className="ph ph-eye"></i>
                            </Link>
                        </td>
                    </tr>
                ))}
            </tbody>
        </table>
    );
}
