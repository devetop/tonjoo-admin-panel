'use client'

import SomethingWentWrong from "@/components/molecules/SomethingWentWrong"

export default function GlobalError({ error }) {
  return (
    <html>
      <body>
        <SomethingWentWrong />
      </body>
    </html>
  )
}