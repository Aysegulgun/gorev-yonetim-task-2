import React from 'react';
import { Link, router } from '@inertiajs/react';
import Layout from '@/Layouts/Layout';

export default function Index({ tasks }) {
    const handleDelete = (taskId) => {
        if (confirm('Bu görevi silmek istediğinizden emin misiniz?')) {
            router.delete(route('tasks.destroy', taskId), {
                preserveScroll: true,
                preserveState: true,
                only: ['tasks'],
            });
        }
    };

    return (
        <Layout>
            <div className="container mx-auto p-4">
                <h1 className="text-2xl font-bold mb-4">Görevler</h1>
                
                <Link
                    href={route('tasks.create')}
                    className="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600"
                >
                    Yeni Görev Ekle
                </Link>

                <div className="mt-6">
                    {tasks && tasks.map(task => (
                        <div key={task.id} className="border p-4 mb-4 rounded shadow">
                            <h2 className="text-xl">{task.title}</h2>
                            <p className="text-gray-600">{task.description}</p>
                            <p className="text-sm text-gray-500 mt-2">
                                Atanan Kişi: {task.user ? task.user.name : 'Atanmamış'}
                            </p>
                            <div className="mt-4 space-x-2">
                                <Link
                                    href={route('tasks.edit', task.id)}
                                    className="text-blue-500 hover:underline"
                                >
                                    Düzenle
                                </Link>
                                <button
                                    onClick={() => handleDelete(task.id)}
                                    className="text-red-500 hover:underline"
                                >
                                    Sil
                                </button>
                            </div>
                        </div>
                    ))}
                </div>
            </div>
        </Layout>
    );
} 