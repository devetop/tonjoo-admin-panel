'use client'

import { FE_BASE_TITLE } from '@/config'
import { useEffect } from 'react'

export const usePageTitle = (title, suffix = `| ${FE_BASE_TITLE}`) => {
  useEffect(() => {
    document.title = title + ' ' + suffix
    
    return () => {
      document.title = FE_BASE_TITLE
    }
  }, [title, suffix])
}