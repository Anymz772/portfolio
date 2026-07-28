@extends('layouts.admin')

@section('admin-content')
<div class="space-y-6">
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-3xl font-heading font-bold text-white">Skills</h1>
            <p class="text-text-secondary mt-2">Manage your technical skills and proficiencies</p>
        </div>
        <a href="{{ route('admin.skills.create') }}" class="btn-primary">
            <span class="flex items-center space-x-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                <span>Add Skill</span>
            </span>
        </a>
    </div>

    <div class="glass-card rounded-xl overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="border-b border-glass-border">
                        <th class="text-left p-4 text-text-secondary font-medium">Skill</th>
                        <th class="text-left p-4 text-text-secondary font-medium">Category</th>
                        <th class="text-left p-4 text-text-secondary font-medium">Proficiency</th>
                        <th class="text-left p-4 text-text-secondary font-medium">Status</th>
                        <th class="text-left p-4 text-text-secondary font-medium">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($skills as $skill)
                    <tr class="border-b border-glass-border hover:bg-white/5 transition-colors">
                        <td class="p-4">
                            <div class="flex items-center space-x-3">
                                <div class="w-8 h-8 bg-accent/10 rounded-lg flex items-center justify-center">
                                    <span class="text-accent text-sm font-bold">{{ strtoupper(substr($skill->name, 0, 2)) }}</span>
                                </div>
                                <span class="text-white">{{ $skill->name }}</span>
                            </div>
                        </td>
                        <td class="p-4">
                            <span class="px-3 py-1 bg-accent/10 text-accent text-sm rounded-full capitalize">{{ $skill->category }}</span>
                        </td>
                        <td class="p-4">
                            <div class="flex items-center space-x-3">
                                <div class="flex-1 h-2 bg-dark rounded-full overflow-hidden">
                                    <div class="h-full bg-accent rounded-full" style="width: {{ $skill->proficiency }}%"></div>
                                </div>
                                <span class="text-text-secondary text-sm">{{ $skill->proficiency }}%</span>
                            </div>
                        </td>
                        <td class="p-4">
                            @if($skill->is_active)
                            <span class="px-2 py-1 bg-green-500/10 text-green-400 text-xs rounded-full">Active</span>
                            @else
                            <span class="px-2 py-1 bg-red-500/10 text-red-400 text-xs rounded-full">Inactive</span>
                            @endif
                        </td>
                        <td class="p-4">
                            <div class="flex items-center space-x-2">
                                <a href="{{ route('admin.skills.edit', $skill) }}" class="p-2 hover:bg-accent/10 rounded-lg transition-colors">
                                    <svg class="w-4 h-4 text-text-secondary hover:text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                    </svg>
                                </a>
                                <form action="{{ route('admin.skills.destroy', $skill) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this skill?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="p-2 hover:bg-red-500/10 rounded-lg transition-colors">
                                        <svg class="w-4 h-4 text-text-secondary hover:text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection