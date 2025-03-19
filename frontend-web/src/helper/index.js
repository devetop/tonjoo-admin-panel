/**
 * untuk memanipulasi query dari router.query yang berbentuk array
 * @param {*} currentQuery nilai dari router.query
 * @param {*} key key dengan [], contoh `tag[]`
 * @param {*} value nilainya, akan ditambah bila tidak ada, akan dihapus bila ada
 * @returns query dengan nilai yang baru
 */
export function setObjectQuery(currentQuery, key, value) {
    const newQuery = { ...currentQuery };

    if (value === '') {
        delete newQuery[key];
    } else {
        if (newQuery[key] && Array.isArray(newQuery[key])) {
            if (newQuery[key].includes(value)) {
                newQuery[key] = newQuery[key].filter((item) => item != value);
            } else {
                newQuery[key].push(value);
            }

            newQuery[key] = newQuery[key].filter((item) => !!item);
        } else {
            if (newQuery[key] == value) {
                delete newQuery[key];
            } else {
                newQuery[key] = newQuery[key] ? [newQuery[key], value] : [value];
            }
        }
    }

    return newQuery;
}

/**
 * untuk mengformat string tanggal ke string tanggal yang ditentukan
 * @param {string} dateString 
 * @param {obj} options 
 * @returns 
 */
export function dateFormat(dateString, options = null) {
    const _date = new Date(dateString);
    const _options = options || { year: 'numeric', month: '2-digit', day: '2-digit', ...options };
    return _date.toLocaleDateString('id-ID', _options).replace(/\//g, ' ').replace(/\./g, '');
}

/**
 * untuk menghapus tag2 html dalam string
 * @param {string} htmlString 
 * @returns 
 */
export function stripHtml(htmlString) {
    return htmlString?.replace(/<[^>]*(>|$)|&nbsp;|&zwnj;|&raquo;|&laquo;|&gt;/gi, '');
}

/**
 * menukarkan url untuk render gambar dari server
 * @param {string} imageSrc 
 * @returns {string}
 */
export function baseUrlExchange(imageSrc) {
    if (typeof process.env.FRONTEND_CMS_CLIENT_REPLACE_IMAGE_URL !== 'undefined') {
        let replaceSrc = process.env.FRONTEND_CMS_CLIENT_REPLACE_IMAGE_URL.split("|");
        if (replaceSrc.length === 2) {
            imageSrc = imageSrc.replace(replaceSrc[0], replaceSrc[1]);
        }
        return imageSrc
    }
    return imageSrc;
}