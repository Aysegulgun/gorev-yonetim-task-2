import React from 'react';
import { useForm, Link } from '@inertiajs/react';
import Layout from '@/Layouts/Layout';

export default function Edit({ user }) {
    const { data, setData, put, processing, errors } = useForm({
        name: user.name,
        email: user.email,
        password: '',
    });

    const handleSubmit = (e) => {
        e.preventDefault();
        put(route('users.update', user.id), {
            preserveScroll: true,
            preserveState: true,
            only: ['users', 'message'],
        });
    };

    return (
        <Layout>
            <div className="container mx-auto p-4">
                <h1 className="text-2xl font-bold mb-4">Kullanıcı Düzenle</h1>

                <form onSubmit={handleSubmit} className="max-w-lg">
                    <div className="mb-4">
                        <label className="block text-gray-700 text-sm font-bold mb-2">
                            Ad Soyad
                        </label>
                        <input
                            type="text"
                            value={data.name}
                            onChange={e => setData('name', e.target.value)}
                            className="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        />
                        {errors.name && <div className="text-red-500 text-sm">{errors.name}</div>}
                    </div>

                    <div className="mb-4">
                        <label className="block text-gray-700 text-sm font-bold mb-2">
                            E-posta
                        </label>
                        <input
                            type="email"
                            value={data.email}
                            onChange={e => setData('email', e.target.value)}
                            className="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        />
                        {errors.email && <div className="text-red-500 text-sm">{errors.email}</div>}
                    </div>

                    <div className="mb-4">
                        <label className="block text-gray-700 text-sm font-bold mb-2">
                            Şifre (değiştirmek istemiyorsanız boş bırakın)
                        </label>
                        <input
                            type="password"
                            value={data.password}
                            onChange={e => setData('password', e.target.value)}
                            className="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        />
                        {errors.password && <div className="text-red-500 text-sm">{errors.password}</div>}
                    </div>

                    <div className="flex items-center justify-between">
                        <button
                            type="submit"
                            disabled={processing}
                            className="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 disabled:opacity-50"
                        >
                            Kullanıcıyı Güncelle
                        </button>
                        <Link
                            href={route('users.index')}
                            className="text-gray-600 hover:underline"
                        >
                            İptal
                        </Link>
                    </div>
                </form>
            </div>
        </Layout>
    );
} 