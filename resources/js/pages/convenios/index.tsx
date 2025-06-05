import { PlaceholderPattern } from '@/components/ui/placeholder-pattern';
import AdminLayout from '@/layouts/admin/admin-layout';
import { type BreadcrumbItem } from '@/types';
import { Head } from '@inertiajs/react';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Convenios',
        href: '/convenios',
    },
];

export default function Convenios() {
    return (
        <AdminLayout breadcrumbs={breadcrumbs}>
            <Head title="Convenios" />
            
        </AdminLayout>
    );
}
