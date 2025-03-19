### todo tap:
- pages router
  - implementasi env tanpa NEXT_PUBLIC - done
  - implementasi rewrite url di fe-dashboard - done
- app router - ongoing
  - implement admin-lte-3-template - done // mengunakan bootstrap-v4.6.2
  /// hari ini - 13 Desember 2024
  - membuat skema get env yang bisa diakses client-component, cara: - done
    - daftarkan client config pada variable CLIENT_CONFIGS di src/lib/constant/config.js
    - get env menggunakan hook: useClientConfigs
  - rewrite url + proxy + image-proxy - done
    - auth: csrf, login - done
  - admin 
    - login: setup redux, api dll - done
    - logout - done
  - dashboard
    - login - done
    - logout - done
    - reset-password - done
  /// hari ini - 16 Desember 2024
  - test Image component - merged
  - admin
    - list data sample table product - semua produk - done
  - dashboard
    - list data sample table product - semua produk milik sendiri - done
    - login dengan sso: handle login sso
- fileupload private-public - done
- implementasi CSR di dashboard - done
- invalidate global state checkout - done

/// progress 24 Desember yang belum
- implementasi role - ongoing
- merapikan env-docker - pending - blocked Image component next gagal render
- dashboard
  - login dengan sso: handle login sso
- merapikan penggunaan enum
- finishing audit-trail
- fixing fitur re-run failed queue
- filter data dengan dengan `$_GET`
- Dokumentasi

## Nice to have
- implementasi google & fb sso
- merge mr mas jundi

## catatankuh
- invalidate state logout admin
- unhandle checkbox change on products terms