import { usePostProductDeleteMutation } from "@/app/admin/products/_api/adminProductApi"
import { Button } from "@/components/ui/button"
import { Checkbox } from "@/components/ui/checkbox"
import { DropdownMenu, DropdownMenuContent, DropdownMenuItem, DropdownMenuLabel, DropdownMenuSeparator, DropdownMenuTrigger } from "@/components/ui/dropdown-menu"
import { MoreHorizontal } from "lucide-react"
import Link from "next/link"
import { toast } from "sonner"

export const productColumns = [
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
    accessorKey: "title",
    header: "Title",
    cell: ({ row }) => (
      <div>{row.getValue("title")}</div>
    ),
  },
  {
    accessorKey: "author_name",
    header: 'Author',
    cell: ({ row }) => (
      <div>{row.getValue("author_name")}</div>
    ),
  },
  {
    accessorKey: "status",
    header: 'Status',
    cell: ({ row }) => (
      <div className="capitalize">{row.getValue("status")}</div>
    ),
  },
  {
    accessorKey: "category",
    header: 'Category',
    cell: ({ row }) => (
      <div>{row.getValue("category")}</div>
    ),
  },
  {
    accessorKey: "tag",
    header: 'Tag',
    cell: ({ row }) => (
      <div>{row.getValue("tag")}</div>
    ),
  },
  {
    id: "actions",
    enableHiding: false,
    cell: ({ row }) => {
      const product = row.original

      const [productDelete] = usePostProductDeleteMutation()

      const onDeleteHandler = () => {
        toast.info(`Are you sure to delete '${product.title}' product's`, {
          action: {
            label: 'Delete',
            onClick: () => {
              productDelete({id:product.id})
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
              onClick={() => navigator.clipboard.writeText(product.id)}
            >
              Copy link address
            </DropdownMenuItem>
            <DropdownMenuSeparator />
            <Link href={`/admin/products/${product.id}/edit`}>
              <DropdownMenuItem>
                Edit
              </DropdownMenuItem>
            </Link>
            <DropdownMenuItem onClick={onDeleteHandler}>
              Delete
            </DropdownMenuItem>
          </DropdownMenuContent>
        </DropdownMenu>
      )
    },
  },
]