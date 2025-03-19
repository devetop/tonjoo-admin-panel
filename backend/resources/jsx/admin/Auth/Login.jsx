import { Link, useForm } from "@inertiajs/react";
import classNames from 'classnames';
import TapHead from "../../_component/TapHead";

export function LoginPanel({submitRouteName, forgotPasswordRouteName, sideTitle, primaryColor = 'var(--primary)'}) {
    const { data, setData, post, errors } = useForm({
        email: '',
        password: '',
        remember: false,
    })

    const onSubmitHandler = (e) => {
        e.preventDefault()
        post(route(submitRouteName))
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
                                        <form role="form" onSubmit={onSubmitHandler}>

                                            <h1>Login</h1>
                                            <p className="text-medium-emphasis">Sign In to your account</p>
                                            <div className={classNames('input-group', {
                                                'mb-3': !errors?.email
                                            })}>
                                                <div className="input-group-prepend">
                                                    <label className="input-group-text" id="id">
                                                        <i className="ph ph-user"></i>
                                                    </label>
                                                </div>
                                                <input
                                                    type="email"
                                                    id="email"
                                                    name="email"
                                                    className="form-control"
                                                    placeholder="Email"
                                                    value={data.email}
                                                    onChange={(e) => setData('email', e.target.value)}
                                                    aria-label="Email" />
                                            </div>
                                            {
                                                errors?.email && <p className="text-danger text-xs pt-1">{errors.email}</p>
                                            }

                                            <div className={classNames('input-group', {
                                                'mb-3': !errors?.email
                                            })}>
                                                <div className="input-group-prepend">
                                                    <label className="input-group-text" id="password">
                                                        <i className="ph ph-lock-key"></i>
                                                    </label>
                                                </div>
                                                <input
                                                    type="password"
                                                    id="password"
                                                    name="password"
                                                    className="form-control"
                                                    placeholder="Password"
                                                    value={data.password}
                                                    onChange={(e) => setData('password', e.target.value)}
                                                    aria-label="Password" />
                                            </div>
                                            {
                                                errors?.password && <p className="text-danger text-xs pt-1">{errors.password}</p>
                                            }

                                            <div className="form-group mb-4">
                                                <div className="form-check form-switch">
                                                    <input className="form-check-input" name="remember" type="checkbox" id="rememberMe" />
                                                    <label className="form-check-label" htmlFor="rememberMe">Remember me</label>
                                                </div>
                                            </div>
                                            <div className="row">
                                                <div className="col-6">
                                                    <button className="btn px-4" style={{ backgroundColor: primaryColor, color: 'white' }} type="submit">Login</button>
                                                </div>
                                                <div className="col-6 text-end">
                                                    <Link href={route(forgotPasswordRouteName)} className="btn btn-link px-0">Forgot password?</Link>
                                                </div>
                                            </div>
                                            {/* <div className="mt-4">
                                                <h2>Login dengan OAuth</h2>
                                                <a href={route('oauth.login', { driver: 'google' })} className="mb-3 btn btn-primary w-100">Login With Google</a>
                                                <a href={route('oauth.login', { driver: 'facebook' })} className="mb-3 btn btn-primary w-100">Login With Facebook</a>
                                            </div> */}
                                        </form>
                                    </div>
                                </div>
                                <div className="card col-md-5 text-white py-5" style={{ backgroundColor: primaryColor }}>
                                    <div className="card-body text-center">
                                        <div className="my-5">
                                            <h4 className="text-white font-weight-bolder position-relative">"{sideTitle}"</h4>
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

export default function Login() {
    return (
        <>
            <TapHead title="Login" />

            <LoginPanel 
                submitRouteName={'cms.login'}
                forgotPasswordRouteName={'cms.password.request'}
                sideTitle={'Laravel - Admin Inertia'}
            />
        </>
    )
}