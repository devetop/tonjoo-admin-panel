"use client"

import { useSelector } from "react-redux"

export default function useClientConfigs() {
    return useSelector(state => state.layout.config)
}