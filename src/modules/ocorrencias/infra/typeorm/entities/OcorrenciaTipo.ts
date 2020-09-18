import {
  Column,
  Entity,
  JoinColumn,
  ManyToOne,
  PrimaryGeneratedColumn,
} from 'typeorm';

import Setor from './Setor';

@Entity('ocorrencia_tipo')
export default class OcorrenciaTipo {
  @PrimaryGeneratedColumn()
  id: number;

  @Column()
  nome: string;

  @Column()
  descricao: string;

  @ManyToOne(() => Setor, { eager: true })
  @JoinColumn({ name: 'setor_id' })
  setor: Setor;

  @Column()
  setor_id: string;
}
