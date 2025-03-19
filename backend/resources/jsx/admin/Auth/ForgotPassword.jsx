import { useForm, usePage } from "@inertiajs/react"
import TapHead from "../../_component/TapHead";

export function ForgotPanel({ submitRouteName, sideTitle, primaryColor = 'var(--primary)' }) {
    const { flash } = usePage().props
    const { data, setData, post, errors } = useForm({
        email: ''
    })

    const onSubmitHandler = (e) => {
        e.preventDefault();
        post(route(submitRouteName));
    }

    return (
        <div className="container d-flex align-items-center" style={{ height: '100vh' }}>
            <div className="row w-100">
                <div className="col-12">
                    <div className="row justify-content-center">
                        <div className="col-lg-9">
                            <div className="card-group d-block d-md-flex row">
                                <div className="card col-md-7 p-4 mb-0">
                                    <div className="card-body">
                                        <h4 className="font-weight-bolder">Reset your password</h4>
                                        <p>Enter your email and please wait a few seconds</p>
                                        <form onSubmit={onSubmitHandler}>
                                            <div className="form-group mb-3">
                                                <input type="email" name="email" className="form-control" placeholder="Email" value={data.email} onChange={e => setData('email', e.target.value)} aria-label="Email" />
                                                {
                                                    errors.email && <p className="text-danger text-xs pt-1">{errors.email}</p>
                                                }
                                            </div>
                                            <div className="text-center">
                                                <button type="submit" className="btn btn-lg btn-lg w-100 mt-4 mb-0" style={{ backgroundColor: primaryColor, color: 'white' }}>Send Reset Link</button>
                                            </div>
                                        </form>
                                        <div className="mt-4" id="alert">
                                            {
                                                flash?.success && (
                                                    <div className="alert alert-success alert-dismissible" role="alert">
                                                        <p className="mb-0">{flash?.success}</p>
                                                    </div>
                                                )
                                            }
                                            {
                                                flash?.error && (
                                                    <div className="alert alert-danger alert-dismissible" role="alert">
                                                        <p className="mb-0">{flash?.error}</p>
                                                    </div>
                                                )
                                            }
                                        </div>
                                    </div>
                                </div>
                                <div className="card col-md-5 text-white py-5" style={{ backgroundColor: primaryColor, color: 'white' }}>
                                    <div className="card-body text-center">
                                        <div className="my-5">
                                            <h4 className="text-white font-weight-bolder position-relative">"{sideTitle || 'Attention is the new currency'}"</h4>
                                            <p className="text-white position-relative">The more effortless the writing looks, the more
                                                effort the writer actually put into the process.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    )
}

export default () => {
    return (
        <>
            <TapHead title="Login" />

            <ForgotPanel
                submitRouteName={'cms.password.email'} 
                sideTitle={'Laravel - Admin Inertia'}
            />
        </>
    )

}