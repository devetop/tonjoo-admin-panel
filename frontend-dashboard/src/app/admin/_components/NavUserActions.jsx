import useAdminLogout from "@/app/(auth-admin)/_hooks/useAdminLogout";
import { DropdownMenuItem } from "@/components/ui/dropdown-menu";
import { LogOut } from "lucide-react";
import Link from "next/link";

export default function NavUserActions() {
    const { logout } = useAdminLogout()
    return (
        <>
            <Link href={'/dashboard'}>
                <DropdownMenuItem>
                    Move To User
                </DropdownMenuItem>
            </Link>
            <DropdownMenuItem onClick={logout}>
              <LogOut />
              Log out
            </DropdownMenuItem>
        </>
    )
}