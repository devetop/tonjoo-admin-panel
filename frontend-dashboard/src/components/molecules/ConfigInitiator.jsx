'use client'

import { setConfig } from '@/lib/redux/slices/layout-slice'
import { useEffect } from 'react'
import { useDispatch } from 'react-redux'

export default function ConfigInitializer({ configData }) {
  const dispatch = useDispatch()
  
  useEffect(() => {
    dispatch(setConfig(configData))
  }, [])

  return null
}