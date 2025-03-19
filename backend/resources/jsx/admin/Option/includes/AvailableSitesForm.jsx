import { Link, useForm } from "@inertiajs/react"
import TextInput from "../../../_component/TextInput"
import CheckboxInput from "../../../_component/CheckboxInput"
import Swal from "sweetalert2"

const _initialData = {
    id: '',
    name: '',
    base_url: '',
    is_cors_allowed: false,
    token: '',
}

export default function AvailableSitesForm({ initialData = _initialData, tipe = 'store' }) {

    const { data, setData, errors, post, put, delete: destroy } = useForm(initialData)

    const onSubmitHandler = (e) => {
        e.preventDefault();

        if (tipe == 'store') {
            post(route('cms.option.available-sites.store'))
        } else {
            setData('_method', 'put');
            put(route('cms.option.available-sites.update', data.id))
        }
    }

    const onGenerateTokenHandler = () => {
        fetch(route('cms.option.available-sites.generate-token', {id: data.id}))
            .then(res=>res.json())
            .then(res=>{
                setData('token', res.data.token)
            })
            .catch(err=>{
                console.log(err);
            })
    }
    const onDeleteTokenHandler = () => {
        fetch(route('cms.option.available-sites.delete-token', {id: data.id}))
            .then(res=>res.json())
            .then(res=>{
                if (res.success) {
                    setData('token', '');
                }
            })
            .catch(err=>{
                console.log(err);
            })
    }
    const onDeleteAvailableSitesHandler = () => {
        if (tipe != 'update') {
            return;
        }

        Swal.fire({
            text: "Are you sure want to delete this available sites?",
            icon: "question",
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            // confirmButtonText: 'Ya, lakukan!'
        }).then((result) => {
            if (result.isConfirmed) {
                destroy(route('cms.option.available-sites.destroy', data.id))
            }
        });
    }

    return (
        <form onSubmit={onSubmitHandler}>
            <div className="row">
                <div className="col-lg-9">

                    <div className="card">
                        <div className="card-body">
                            <TextInput
                                label="Name"
                                name="name"
                                value={data.name}
                                onChangeHandler={(e) => setData('name', e.target.value)}
                                error={errors?.name}
                            />
                            <TextInput
                                label="Base Url"
                                name="base_url"
                                value={data.base_url}
                                onChangeHandler={(e) => setData('base_url', e.target.value)}
                                error={errors?.base_url}
                            />
                            {
                                data.id
                                    ? (
                                        <div className="mb-3">
                                            <label htmlFor="token" className="form-label">
                                                Token 
                                                {
                                                    !data.token 
                                                    ? <button className="ml-2 btn btn-sm btn-primary" type="button" onClick={onGenerateTokenHandler}>
                                                        <i className="ph ph-arrow-counter-clockwise"></i>
                                                    </button>
                                                    : <button className="ml-2 btn btn-sm btn-default" type="button" onClick={onDeleteTokenHandler}>
                                                        <i className="ph ph-trash"></i>
                                                    </button>
                                                }
                                                
                                            </label>
                                            <input type="text" className="form-control form-control-sm" disabled value={data.token} />
                                        </div>
                                    ) : ''
                            }
                            <CheckboxInput
                                label="Is Cors Allowed"
                                name="is_cors_allowed"
                                value={data.is_cors_allowed}
                                onChangeHandler={e => setData('is_cors_allowed', e.target.checked)}
                            />
                        </div>
                    </div>
                </div>

                <div className="col-lg-3">
                    <div className="card mb-3">
                        <div className="card-header">
                            <h5 className="card-title mb-0">Action</h5>
                        </div>
                        <div className="card-body">
                            <div className="row">
                                <div className="col">
                                    <Link
                                        href={route('cms.option.available-sites.index')}
                                        className="btn btn-default w-100"
                                    >
                                        Cancel
                                    </Link>
                                </div>
                                <div className="col">
                                    <button className="btn btn-primary w-100" type="submit">
                                        Save
                                    </button>
                                </div>
                            </div>
                            {
                                (tipe == 'update')
                                ? (
                                    <button className="mt-3 text-danger btn btn-sm" type="button" onClick={onDeleteAvailableSitesHandler}>
                                        <i className="fas fa-trash mr-2"></i> Delete available sites
                                    </button>
                                ) : ''
                            }
                        </div>
                    </div>
                </div>
            </div>
        </form>
    )
}