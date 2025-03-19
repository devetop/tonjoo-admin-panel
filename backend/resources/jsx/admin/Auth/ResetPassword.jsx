import { useForm, usePage } from "@inertiajs/react"
import TapHead from "../../_component/TapHead";

function ResetPasswordPanel({ token, email, primaryColor, sideTitle = 'Laravel - Inertia Dashboard' }) {
    const { flash } = usePage().props
    const { data, setData, post, errors } = useForm({
        token,
        email,
        password: '',
        password_confirmation: ''
    })

    const onSubmitHandler = (e) => {
        e.preventDefault();
        post(route('cms.password.update'))
    }

    return (
        <>
            <TapHead title="Reset Password" />

            <div className="container d-flex align-items-center" style={{ height: '100vh' }}>
                <div className="row w-100">
                    <div className="col-12">
                        <div className="row justify-content-center">
                            <div className="col-lg-9">
                                <div className="card-group d-block d-md-flex row">
                                    <div className="card col-md-7 p-4 mb-0">
                                        <div className="card-body">
                                            <h1 className="h4 font-weight-bolder">Change password</h1>
                                            <p>Set a new password for your email</p>
                                            <form role="form" onSubmit={onSubmitHandler}>

                                                <div className="form-group mb-3">
                                                    <input
                                                        type="email"
                                                        className="form-control"
                                                        placeholder="Email"
                                                        value={data.email}
                                                        onChange={(e) => setData('email', e.target.value)}
                                                        aria-label="Email"
                                                    />
                                                    {
                                                        errors?.email && <p className="text-danger text-xs pt-1">{errors.email}</p>
                                                    }
                                                </div>

                                                <div className="form-group mb-3">
                                                    <input
                                                        type="password"
                                                        className="form-control"
                                                        placeholder="Password"
                                                        value={data.password}
                                                        onChange={(e) => setData('password', e.target.value)}
                                                        aria-label="Password"
                                                    />
                                                    {
                                                        errors?.password && <p className="text-danger text-xs pt-1">{errors.password}</p>
                                                    }
                                                </div>

                                                <div className="form-group mb-3">
                                                    <input
                                                        type="password"
                                                        className="form-control"
                                                        placeholder="Password"
                                                        value={data.password_confirmation}
                                                        onChange={(e) => setData('password_confirmation', e.target.value)}
                                                        aria-label="Password"
                                                    />
                                                    {
                                                        errors?.password_confirmation && <p className="text-danger text-xs pt-1">{errors.password_confirmation}</p>
                                                    }
                                                </div>

                                                <div className="text-center">
                                                    <button type="submit" className="btn btn-lg btn-lg w-100 mt-4 mb-0 text-white" style={{ backgroundColor: primaryColor }}>Reset Password</button>
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
                                    <div className="card col-md-5 text-white py-5" style={{ backgroundColor: primaryColor }}>
                                        <div className="card-body text-center">
                                            <div className="d-flex flex-column justify-content-center h-100">
                                                <h1 className="h4 text-white font-weight-bolder position-relative">"{sideTitle}"</h1>
                                                <p className="text-white position-relative mb-0">The more effortless the writing looks, the more
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
        </>
    )
}

export default function ResetPassword({ token, email }) {
    return (
        <ResetPasswordPanel
            token={token}
            email={email}
            primaryColor={'var(--primary)'}
        />
    )
}