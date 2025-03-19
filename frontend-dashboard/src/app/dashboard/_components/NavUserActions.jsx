import { DropdownMenuItem } from "@/components/ui/dropdown-menu";
import useLogout from "@/app/(auth)/login/_hooks/useLogout";
import { LogOut } from "lucide-react";
import Link from "next/link";

export default function NavUserActions() {
    const { logout } = useLogout()
    return (
        <>
            <Link href={'/admin'}>
                <DropdownMenuItem>
                    Move To Admin
                </DropdownMenuItem>
            </Link>
            <DropdownMenuItem onClick={logout}>
              <LogOut />
              Log out
            </DropdownMenuItem>
        </>
    )
}