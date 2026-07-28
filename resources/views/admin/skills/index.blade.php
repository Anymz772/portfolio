@extends('layouts.admin')

@section('admin-content')
<div class="space-y-8">
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h1 class="text-3xl lg:text-4xl font-display font-bold">Skills</h1>
            <p class="text-muted-foreground mt-2">Manage your technical skills, categories, and proficiency percentages.</p>
        </div>
        <a href="{{ route('admin.skills.create') }}" class="btn-primary shrink-0 self-start sm:self-auto">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
            </svg>
            <span>Add Skill</span>
        </a>
    </div>

    <div class="glass-card rounded-3xl overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="border-b border-border bg-card/40 text-xs font-semibold uppercase tracking-wider text-muted-foreground">
                        <th class="p-5">Skill</th>
                        <th class="p-5">Category</th>
                        <th class="p-5">Proficiency</th>
                        <th class="p-5">Status</th>
                        <th class="p-5 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-border">
                    @foreach($skills as $skill)
                    <tr class="hover:bg-card/40 transition-colors">
                        <td class="p-5">
                            <div class="flex items-center space-x-3">
                                <div class="w-9 h-9 bg-primary/10 border border-primary/20 rounded-xl flex items-center justify-center">
                                    <span class="text-primary font-display text-xs font-bold">{{ strtoupper(substr($skill->name, 0, 2)) }}</span>
                                </div>
                                <span class="font-semibold text-foreground">{{ $skill->name }}</span>
                            </div>
                        </td>
                        <td class="p-5">
                            <span class="px-3 py-1 bg-primary/10 text-primary text-xs font-semibold rounded-full capitalize border border-primary/20">{{ $skill->category }}</span>
                        </td>
                        <td class="p-5">
                            <div class="flex items-center space-x-3 max-w-xs">
                                <div class="flex-1 h-2 bg-background rounded-full overflow-hidden border border-border">
                                    <div class="h-full bg-primary rounded-full" style="width: {{ $skill->proficiency }}%"></div>
                                </div>
                                <span class="text-xs font-mono text-muted-foreground">{{ $skill->proficiency }}%</span>
                            </div>
                        </td>
                        <td class="p-5">
                            @if($skill->is_active)
                            <span class="px-2.5 py-1 bg-emerald-500/10 text-emerald-400 text-xs font-medium rounded-full border border-emerald-500/20">Active</span>
                            @else
                            <span class="px-2.5 py-1 bg-rose-500/10 text-rose-400 text-xs font-medium rounded-full border border-rose-500/20">Inactive</span>
                            @endif
                        </td>
                        <td class="p-5 text-right">
                            <div class="flex items-center justify-end space-x-2">
                                <a href="{{ route('admin.skills.edit', $skill) }}" class="p-2 hover:bg-primary/10 text-muted-foreground hover:text-primary rounded-xl transition-colors">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                    </svg>
                                </a>
                                <form action="{{ route('admin.skills.destroy', $skill) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this skill?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="p-2 hover:bg-red-500/10 text-muted-foreground hover:text-red-400 rounded-xl transition-colors">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
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