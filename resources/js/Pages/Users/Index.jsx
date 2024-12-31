import React from 'react';
import { Link } from '@inertiajs/react';
import Layout from '@/Layouts/Layout';

export default function Index({ users }) {
    return (
        <Layout>
            <div className="container mx-auto p-4">
                <h1 className="text-2xl font-bold mb-4">Kullanıcılar</h1>
                
                <Link
                    href={route('users.create')}
                    className="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600"
                >
                    Yeni Kullanıcı Ekle
                </Link>

                <div className="mt-6">
                    {users && users.map(user => (
                        <div key={user.id} className="border p-4 mb-4 rounded shadow">
                            <h2 className="text-xl">{user.name}</h2>
                            <p className="text-gray-600">{user.email}</p>
                            <div className="mt-4 space-x-2">
                                <Link
                                    href={route('users.edit', user.id)}
                                    className="text-blue-500 hover:underline"
                                >
                                    Düzenle
                                </Link>
                                <Link
                                    href={route('users.destroy', user.id)}
                                    method="delete"
                                    as="button"
                                    className="text-red-500 hover:underline"
                                >
                                    Sil
                                </Link>
                            </div>
                        </div>
                    ))}
                </div>
            </div>
        </Layout>
    );
} 