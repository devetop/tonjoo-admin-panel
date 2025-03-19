import { toast } from "sonner";

export const getPersistedStateData = () => {
    const persistedData = localStorage.getItem('persist:root');
    const parsedData = persistedData
        ? JSON.parse(persistedData)
        : null;
    return parsedData
}

/**
 * untuk ubah array ke object agar lebih mudah reproduce errornya
 * @param {Object} default error validasi dari BE
 * @returns 
 */
export const validationTransformError = (error) => {
    try {
        error?.data?.message && toast.error(error?.data?.message)

        if (!error?.data) return error
        const { message, errors } = error.data

        if (!errors || typeof errors !== 'object') {
            return error.data
        }

        const transformedErrors = Object.fromEntries(
            Object.entries(errors).map(([key, value]) => [
                key,
                Array.isArray(value) ? value[0] : value
            ])
        )

        return {
            message,
            errors: transformedErrors
        }
    } catch (e) {
        return error
    }
}