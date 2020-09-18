import {
  Entity,
  Column,
  PrimaryGeneratedColumn,
  ManyToOne,
  JoinColumn,
  CreateDateColumn,
  UpdateDateColumn,
} from 'typeorm';

import UsuarioTipo from './UsuarioTipo';

@Entity('usuario')
class Usuario {
  @PrimaryGeneratedColumn()
  id: number;

  @Column()
  ra_siape: string;

  @Column()
  nome: string;

  @Column()
  email: string;

  @Column()
  senha: string;

  @ManyToOne(() => UsuarioTipo, { eager: true })
  @JoinColumn({ name: 'usuario_tipo_id' })
  usuario_tipo: UsuarioTipo;

  @Column()
  usuario_tipo_id: string;

  @CreateDateColumn()
  created_at: Date;

  @UpdateDateColumn()
  updated_at: Date;
}

export default Usuario;
