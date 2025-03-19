import { usePage } from "@inertiajs/react";
import React, { useEffect, useState } from "react";

export default function AlertModal({ type, flash_name = false, message = null }) {

    const { flash } = usePage().props
    const [_message, setMessage] = useState(message)

    useEffect(() => {
        if (flash_name) {
            if (flash_name.includes('custom.')) {
                const key = flash_name.replace('custom.', '')
                if (flash['custom'] && flash['custom'][key]) {
                    setMessage(flash['custom'][key])
                } else { 
                    setMessage(null)
                }
            } else {
                flash[flash_name] ? setMessage(flash[flash_name]) : setMessage(null)
            }
        }
    }, [flash])

    useEffect(() => {
        setMessage(message)
    }, [message])

    useEffect(() => {
        let timer;
        if (_message) {
            timer = setTimeout(() => {
                setMessage(null)
            }, 4000) // 4000ms = 4 detik
        }

        return () => {
            if (timer) {
                clearTimeout(timer)
            }
        }
    }, [_message])

    return _message 
    ? (
        <div className={`alert alert-${type} alert-dismissible fade show`} role="alert">
            {_message}
            <button type="button" className="close" data-dismiss="alert" aria-hidden="true" onClick={() => setMessage(null)}>×</button>
        </div>
    ) : ('')
}

export function AllPagesAlertModal({ type }) {
    const { flash } = usePage().props;
    const [visible, setVisible] = useState(true);
    
    useEffect(() => {
        setVisible(true)
    }, [flash])

    if (!flash[type] || !visible) {
        return null;
    }

    return (
        <div className={`alert alert-${type == 'error' ? 'danger' : type} alert-dismissible fade show`} role="alert">
            {flash[type]}
            <button 
                type="button" 
                className="close" 
                data-dismiss="alert" 
                aria-hidden="true" 
                onClick={() => setVisible(false)}
            >
                ×
            </button>
        </div>
    );
}