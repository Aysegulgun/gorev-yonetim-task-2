import React from 'react';
import { Link, usePage } from '@inertiajs/react';

export default function Layout({ children }) {
    const { flash } = usePage().props;

    return (
        <div className="min-h-screen bg-gray-100">
            <nav className="bg-white shadow-sm">
                <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div className="flex justify-between h-16">
                        <div className="flex">
                            <div className="flex-shrink-0 flex items-center">
                                <h1 className="text-xl font-bold">Siliconmade Academy</h1>
                            </div>
                            <div className="hidden sm:ml-6 sm:flex sm:space-x-8">
                                <Link
                                    href={route('tasks.index')}
                                    className="inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium"
                                >
                                    Görevler
                                </Link>
                                <Link
                                    href={route('users.index')}
                                    className="inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium"
                                >
                                    Kullanıcılar
                                </Link>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>

            {flash && flash.message && (
                <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-4">
                    <div className="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded">
                        {flash.message}
                    </div>
                </div>
            )}

            {flash && flash.error && (
                <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-4">
                    <div className="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
                        {flash.error}
                    </div>
                </div>
            )}

            <main className="py-12">
                {children}
            </main>
        </div>
    );
} 