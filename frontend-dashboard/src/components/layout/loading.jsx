import { LoaderCircle } from "lucide-react";

export default function Loading() {
    return (
        <div className="fixed inset-0 flex justify-center items-center bg-white/80 z-50">
            <LoaderCircle className="w-8 h-8 text-gray-500 animate-spin" />
        </div>
    );
}