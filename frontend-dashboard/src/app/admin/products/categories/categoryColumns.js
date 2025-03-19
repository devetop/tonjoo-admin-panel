import { Button } from "@/components/ui/button"
import { Checkbox } from "@/components/ui/checkbox"
import { DropdownMenu, DropdownMenuContent, DropdownMenuItem, DropdownMenuLabel, DropdownMenuSeparator, DropdownMenuTrigger } from "@/components/ui/dropdown-menu"
import { MoreHorizontal } from "lucide-react"
import Link from "next/link"
import { usePostDeleteProductCategoryMutation } from "../_api/adminProductApi"
import { toast } from "sonner"

export const categoryColumns = [
  {
    id: "select",
    header: ({ table }) => (
      <Checkbox
        checked={
          table.getIsAllPageRowsSelected() ||
          (table.getIsSomePageRowsSelected() && "indeterminate")
        }
        onCheckedChange={(value) => table.toggleAllPageRowsSelected(!!value)}
        aria-label="Select all"
      />
    ),
    cell: ({ row }) => (
      <Checkbox
        checked={row.getIsSelected()}
        onCheckedChange={(value) => row.toggleSelected(!!value)}
        aria-label="Select row"
      />
    ),
    enableSorting: false,
    enableHiding: false,
  },
  {
    accessorKey: "name",
    header: "Name",
    cell: ({ row }) => (
      <div>{row.getValue("name")}</div>
    ),
  },
  {
    id: "actions",
    enableHiding: false,
    cell: ({ row }) => {
      const category = row.original

      const [deleteCategory] = usePostDeleteProductCategoryMutation()
      const categoryDeleteHandler = () => {
        toast.info(`Are you sure to delete ${category.name} category`, {
          action: {
            label: 'Delete',
            onClick: () => {
              deleteCategory({id: category.id})
                .unwrap()
                .then((res) => {
                  toast.success(res?.message);
                })
                .catch((err) => {
                  toast.error(err?.data?.message);
                })
            }
          }
        })
      }

      return (
        <DropdownMenu>
          <DropdownMenuTrigger asChild>
            <Button variant="ghost" className="h-8 w-8 p-0">
              <span className="sr-only">Open menu</span>
              <MoreHorizontal />
            </Button>
          </DropdownMenuTrigger>
          <DropdownMenuContent align="end">
            <DropdownMenuLabel>Actions</DropdownMenuLabel>
            <DropdownMenuItem
              onClick={() => navigator.clipboard.writeText(category.id)}
            >
              Copy link address
            </DropdownMenuItem>
            <DropdownMenuSeparator />
            <Link href={`/admin/products/categories/${category.id}/edit`}>
              <DropdownMenuItem>
                Edit
              </DropdownMenuItem>
            </Link>
            <DropdownMenuItem onClick={categoryDeleteHandler}>
              Delete
            </DropdownMenuItem>
          </DropdownMenuContent>
        </DropdownMenu>
      )
    },
  },
]