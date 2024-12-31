import React from 'react';
import { useForm, Link } from '@inertiajs/react';
import Layout from '@/Layouts/Layout';

export default function Create({ users }) {
    const { data, setData, post, processing, errors } = useForm({
        title: '',
        description: '',
        user_id: '',
    });

    const handleSubmit = (e) => {
        e.preventDefault();
        post(route('tasks.store'), {
            preserveScroll: true,
            preserveState: true,
            only: ['tasks', 'message'],
        });
    };

    return (
        <Layout>
            <div className="container mx-auto p-4">
                <h1 className="text-2xl font-bold mb-4">Yeni Görev Oluştur</h1>

                <form onSubmit={handleSubmit} className="max-w-lg">
                    <div className="mb-4">
                        <label className="block text-gray-700 text-sm font-bold mb-2">
                            Başlık
                        </label>
                        <input
                            type="text"
                            value={data.title}
                            onChange={e => setData('title', e.target.value)}
                            className="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        />
                        {errors.title && <div className="text-red-500 text-sm">{errors.title}</div>}
                    </div>

                    <div className="mb-4">
                        <label className="block text-gray-700 text-sm font-bold mb-2">
                            Açıklama
                        </label>
                        <textarea
                            value={data.description}
                            onChange={e => setData('description', e.target.value)}
                            className="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            rows="4"
                        />
                        {errors.description && <div className="text-red-500 text-sm">{errors.description}</div>}
                    </div>

                    <div className="mb-4">
                        <label className="block text-gray-700 text-sm font-bold mb-2">
                            Atanan Kullanıcı
                        </label>
                        <select
                            value={data.user_id}
                            onChange={e => setData('user_id', e.target.value)}
                            className="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        >
                            <option value="">Kullanıcı Seçin</option>
                            {users.map(user => (
                                <option key={user.id} value={user.id}>
                                    {user.name}
                                </option>
                            ))}
                        </select>
                        {errors.user_id && <div className="text-red-500 text-sm">{errors.user_id}</div>}
                    </div>

                    <div className="flex items-center justify-between">
                        <button
                            type="submit"
                            disabled={processing}
                            className="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 disabled:opacity-50"
                        >
                            Görev Oluştur
                        </button>
                        <Link
                            href={route('tasks.index')}
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